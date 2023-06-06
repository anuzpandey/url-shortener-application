<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Link;

class LinkTable extends DataTableComponent
{
    protected $index = 0;

    protected $model = Link::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setTableAttributes([
            'id' => 'link-table',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make('SN.')
                ->label(fn($row, Column $column) => ++$this->index)
                ->sortable(),
            Column::make("Title", "title")
                ->format(
                    function ($value, $row, Column $column) {
                        $title = Str::title($value);
                        $counter = $row->counter;

                        return '
                            <div class="flex flex-col gap-1">
                                <h5 class="text-truncate text-base font-bold" style="line-height: 26px">' . Str::limit($title, 50) . '</h5>
                                <div class="text-neutral-600 text-sm">
                                    <span class="font-medium">Clicks: ' . $counter . '</span>
                                </div>
                            </div>
                        ';
                    }
                )
                ->html()
                ->searchable()
                ->sortable(),
            Column::make("Url", "url")
                ->format(function ($value, $row, Column $column) {
                    return '
                        <div class="flex flex-col gap-1">
                            <a href="//' . $value . '" target="_blank" class="text-blue-600 hover:underline">
                                ' . Str::limit($value, 50) . '
                            </a>
                            <div class="text-neutral-600 text-sm">
                                <span class="font-medium">Created: ' . $row->created_at->format('d M Y') . '</span>
                            </div>
                        </div>

                    ';
                })
                ->searchable()
                ->html()
                ->sortable(),
            Column::make("URL ID", "shortened_url")
                ->searchable()
                ->sortable(),
            Column::make("Expires at", "expired_at")
                ->format(function ($value, $row, Column $column) {
                    return $value ? $value->format('d M Y') : '-';
                })
                ->sortable(),
            Column::make("Added By", "user.name")
                ->eagerLoadRelations()
                ->searchable()
                ->sortable(),
            Column::make('Action')
                ->label(
                    fn($row, Column $column) => view('livewire-tables::components.actions', [
                        'editRoute' => route('cms.links.edit', $row->id),
                        'deleteRoute' => route('cms.links.destroy', $row->id),
                        'showRoute' => route('cms.links.show', $row->id),
                        'updatePermission' => 'update-user',
                        'deletePermission' => 'delete-user',
                        'showPermission' => 'show-user',
                        'row' => $row,
                        'column' => $column,
                    ])
                )
                ->html(),
        ];
    }

    public function builder(): Builder
    {
        return Link::query()
            ->with('user')
            ->select(['links.id', 'links.counter', 'links.created_at'])
            ->latest();
    }
}
