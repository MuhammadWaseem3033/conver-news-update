<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Carbon\Carbon;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        // dd(request()->all());
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('title'),
                    TextInput::make('meta_title'),
                    Textarea::make('meta_discription'),

                    Toggle::make('status')
                        ->label('Status (Published or Unpublished)')
                        ->onColor('success')
                        ->offColor('danger'),
                ])->columnSpan(1),

                Section::make()->schema([
                    SelectTree::make('category_id')
                        ->relationship('category', 'name', 'parent_id')
                        ->withCount()
                        ->searchable()
                        ->enableBranchNode(),

                    TagsInput::make('tag')
                        ->default([])
                        ->color('danger')
                        ->separator(',')
                        ->suggestions([
                            'Politics',
                            'Business',
                            'Corporate',
                            'Sports',
                            'Health',
                            'Education',
                            'Science',
                            'Technology',
                            'Entertainment',
                        ])
                        ->nestedRecursiveRules([
                            'min:3',
                            'max:255',
                        ]),

                    TagsInput::make('meta_keyword')
                    ->default([])
                    ->color('success')
                    ->separator(',')
                    ->nestedRecursiveRules([
                        'min:3',
                        'max:255',
                    ])
                    ,

                    FileUpload::make('image')
                        ->disk('public')
                        ->directory('News/images')
                        ->imageEditor(),

                ])->columnSpan(1),

                Section::make()->schema([

                    RichEditor::make('discription'),

                ])->columnSpanFull(),

                TextInput::make('user_id')
                    ->default(fn() => Auth::id())
                    // ->hidden()
                    ->readOnly(),

            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('title')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('meta_title')
                    ->toggleable()
                    ->sortable(),
                ToggleColumn::make('status')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('tag')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('meta_description')
                    ->toggleable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('description')
                    ->toggleable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('created_at')
                    ->toggleable()
                    ->sortable()
                    ->dateTime(),
            ])
            ->filters(
                [
                    SelectFilter::make('status')
                        ->options([
                            '1' => 'Published',
                            '0' => 'UnPublished',
                        ]),

                    SelectFilter::make('category_id')
                        ->label('Category')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload(),
                    SelectFilter::make('user_id')
                        ->label('User')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload(),

                ],
                layout: FiltersLayout::AboveContent
                // layout: FiltersLayout::Modal
            )
            // ->filtersFormColumns(4)

            ->filtersTriggerAction(
                fn(Action $action) => $action
                    ->button()
                    ->label('Filter'),
            )
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
