<?php

namespace App\Filament\Pages;

use App\Models\Carousel;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Log;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UploadCloudinary extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static string $view = 'filament.pages.upload-cloudinary';
    protected static ?string $navigationLabel = 'Upload ke Cloudinary';

    protected function getFormSchema(): array
    {
        return [
            Section::make('Carousel')
                ->schema([
                    TextInput::make('carouselTitle')
                        ->label('Judul')
                        ->required()
                        ->dehydrated(), // agar masuk ke form state

                    FileUpload::make('image_desktop')
                        ->label('Gambar Desktop')
                        ->image()
                        ->multiple(false)
                        ->dehydrated(), // agar masuk ke form state

                    FileUpload::make('image_mobile')
                        ->label('Gambar Mobile')
                        ->image()
                        ->multiple(false)
                        ->dehydrated(),

                    TextInput::make('order')
                        ->numeric()
                        ->default(0)
                        ->dehydrated(),

                    Toggle::make('is_active')
                        ->default(true)
                        ->dehydrated(),
                ]),
        ];
    }

    public function mount(): void
    {
        $this->form->fill(); // inisialisasi form
    }

    public function submit(): void
    {
        try {
            $state = $this->form->getState();

            // dd($state); // <- aktifkan untuk debug form

            $desktopFile = $state['image_desktop'] ?? null;
            $mobileFile  = $state['image_mobile'] ?? null;

            if (! $desktopFile || ! $mobileFile) {
                throw new \Exception('File desktop atau mobile tidak ditemukan.');
            }

            $uploadedDesktop = Cloudinary::upload(
                $desktopFile->getRealPath(),
                ['folder' => 'carousel/desktop']
            );

            $uploadedMobile = Cloudinary::upload(
                $mobileFile->getRealPath(),
                ['folder' => 'carousel/mobile']
            );

            Carousel::create([
                'title'         => $state['carouselTitle'],
                'image_desktop' => $uploadedDesktop->getSecurePath(),
                'image_mobile'  => $uploadedMobile->getSecurePath(),
                'order'         => $state['order'] ?? 0,
                'is_active'     => $state['is_active'] ?? false,
            ]);

            Notification::make()
                ->title('Carousel berhasil diunggah!')
                ->success()
                ->send();

            $this->form->fill(); // reset form
        } catch (\Throwable $e) {
            Log::error($e);
            Notification::make()
                ->title('Gagal mengunggah carousel')
                ->body($e->getMessage())
                ->color('danger')
                ->send();
        }
    }
}
