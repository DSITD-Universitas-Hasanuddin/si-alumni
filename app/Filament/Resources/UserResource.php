<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Pages\Actions\EditAction;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->disabled(),
                Forms\Components\TextInput::make('nim')
                    ->required()
                    ->exists('alumnis')
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('name')
                    ->required(fn(string $context): bool => $context === 'create')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jurusan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('angkatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('profile_desc')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempat_kerja')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_perusahaan')
                    ->maxLength(255),
                Forms\Components\Select::make('jabatan')
                    ->options([
                        'Tingkat Direktur(misal, Direktur Utama, Direktur Operasional, Direktur Keuangan)' => 'Tingkat Direktur(misal, Direktur Utama, Direktur Operasional, Direktur Keuangan)',
                        'Direktur' => 'Direktur',
                        'HRD (SDM) Profesional' => 'HRD (SDM) Profesional',
                        'Manajer' => 'Manajer',
                        'Konsultan/Penasihat' => 'Konsultan/Penasihat',
                        'Analis/Spesialis' => 'Analis/Spesialis',
                        'Lainnya: …' => 'Lainnya: …',
                    ])
                    ->searchable()
                    ->default('')
                    ->disablePlaceholderSelection(),
                Forms\Components\Select::make('provinsi')
                    ->options([
                        'Aceh' => 'Aceh',
                        'Sumatera Utara' => 'Sumatera Utara',
                        'Sumatera Barat' => 'Sumatera Barat',
                        'Sumatera Selatan' => 'Sumatera Selatan',
                        'Riau' => 'Riau',
                        'Kepulauan Riau' => 'Kepulauan Riau',
                        'Jambi' => 'Jambi',
                        'Kepulauan Bangka Belitung' => 'Kepulauan Bangka Belitung',
                        'Bengkulu' => 'Bengkulu',
                        'Jawa Barat' => 'Jawa Barat',
                        'Banten' => 'Banten',
                        'Jawa Tengah' => 'Jawa Tengah',
                        'DI Yogyakarta' => 'DI Yogyakarta',
                        'Jawa Timur' => 'Jawa Timur',
                        'Bali' => 'Bali',
                        'Nusa Tenggara Barat' => 'Nusa Tenggara Barat',
                        'Nusa Tenggara Timur' => 'Nusa Tenggara Timur',
                        'Kalimantan Barat' => 'Kalimantan Tengah',
                        'Kalimantan Selatan' => 'Kalimantan Selatan',
                        'Kalimantan Timur' => 'Kalimantan Timur',
                        'Kalimantan Utara' => 'Kalimantan Utara',
                        'Sulawesi Utara' => 'Sulawesi Utara',
                        'Gorontalo' => 'Gorontalo',
                        'Sulawesi Tengah' => 'Sulawesi Tengah',
                        'Sulawesi Barat' => 'Sulawesi Barat',
                        'Sulawesi Selatan' => 'Sulawesi Selatan',
                        'Sulawesi Tenggara' => 'Sulawesi Tenggara',
                        'Maluku' => 'Maluku',
                        'Maluku Utara' => 'Maluku Utara',
                        'Papua' => 'Papua',
                        'Papua Barat' => 'Papua Barat',
                        'Papua Tengah' => 'Papua Tengah',
                        'Papua Pegunungan' => 'Papua Pegunungan',
                        'Papua Selatan' => 'Papua Selatan',
                        'Papua Barat Daya' => 'Papua Barat Daya',
                        'Luar Negeri' => 'Luar Negeri',
                    ])
                    ->searchable()
                    ->default('')
                    ->disablePlaceholderSelection(),
                Forms\Components\TextInput::make('kota')
                    ->maxLength(255),
                Forms\Components\Select::make('level_perusahaan')
                    ->options([
                        'Multinasional' => 'Multinasional',
                        'Nasional' => 'Nasional',
                    ])
                    ->searchable()
                    ->default('')
                    ->disablePlaceholderSelection(),
                Forms\Components\Select::make('jenis_perusahaan')
                    ->options([
                        'Agriculture / Fishing / Forestry' => 'Agriculture / Fishing / Forestry',
                        'Construction / Real Estate' => 'Construction / Real Estate',
                        'Consulting / Professional Services' => 'Consulting/Professional Services',
                        'Consumer Goods' => 'Consumer Goods',
                        'Defence / Security / Rescue' => 'Defence / Security / Rescue',
                        'Education' => 'Education',
                        'Engineering' => 'Engineering',
                        'Entertainment / Leisure' => 'Entertainment / Leisure',
                        'Finance / Banking' => 'Finance / Banking',
                        'Government/Public sector' => 'Government/Public sector',
                        'Health/Medical' => 'Health/Medical',
                        'Hospitality / Travel / Tourism' => 'Hospitality / Travel / Tourism',
                        'HR / Recruitment / Training' => 'HR / Recruitment / Training',
                        'Law' => 'Law',
                        'Logistics/Transportation Manufacturing' => 'Logistics/Transportation Manufacturing',
                        'Media / Advertising' => 'Media / Advertising',
                        'Metals / Mining' => 'Metals / Mining',
                        'Non-profit/ Charity' => 'Non-profit/ Charity',
                        'Lainnya: …' => 'Lainnya: …',
                    ])
                    ->searchable()
                    ->default('')
                    ->disablePlaceholderSelection(),
                    // ->createOptionForm([
                    //     Forms\Components\TextInput::make('jenis_perusahaan')
                    //         ->nullable(),
                    // ]),
                Forms\Components\TextInput::make('alamat_perusahaan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->required(fn(string $context): bool => $context === 'create')
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->visibleOn('create')
                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context): bool => $context === 'create'),
                Forms\Components\Select::make('role')
                    ->options([
                        '0' => 'Admin',
                        '4' => 'Alumni',
                    ])
                    ->default('0')
                    ->disablePlaceholderSelection()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jurusan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('angkatan'),
                Tables\Columns\TextColumn::make('profile_desc')
                    ->label('Pekerjaan'),
                Tables\Columns\TextColumn::make('tempat_kerja')
                    ->label('Tempat Kerja'),
                Tables\Columns\TextColumn::make('nama_perusahaan')
                    ->label('Nama Perusahaan'),
                Tables\Columns\TextColumn::make('level_perusahaan')
                    ->label('Level Perusahaan'),
                Tables\Columns\TextColumn::make('jenis_perusahaan')
                    ->label('Jenis Perusahaan'),
                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan'),
                Tables\Columns\TextColumn::make('provinsi')
                    ->label('Provinsi Tempat Kerja'),
                Tables\Columns\TextColumn::make('kota')
                    ->label('Kota/Kabupaten Tempat Kerja'),
                Tables\Columns\TextColumn::make('alamat_perusahaan')
                    ->label('Alamat Perusahaan'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('profile_photo_url'),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export')
            ])
            ->headerActions([
                FilamentExportHeaderAction::make('export')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}