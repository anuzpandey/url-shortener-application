<?php

namespace App\Http\Livewire;

use App\Enums\UserType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
    protected $index = 0;

    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setTableAttributes([
            'id' => 'user-table',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make('SN.')
                ->label(fn($row, Column $column) => ++$this->index)
                ->sortable(),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable()
                ->format(function ($value, $row, Column $column) {
                    $initials = Str::initials(auth()->user()->name);

                    return '
                        <div class="flex items-center gap-2">
                            <div class="avatar placeholder">
                                <div class="bg-neutral-focus text-neutral-content rounded-full w-8">
                                    <span>' . $initials . '</span>
                                </div>
                            </div>

                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="text-truncate font-size-16 mb-0" style="line-height: 26px">' . Str::limit($row->name, 50) . '</h5>
                            </div>
                        </div>
                    ';
                })
                ->html(),
            Column::make('Email', 'email')
                ->searchable()
                ->sortable(),
            Column::make('User Role')
                ->label(function (User $row, Column $column) {
                    return '
                        <div class="badge badge-accent badge-outline">' . UserType::from($row->user_type)->name . '</div>
                    ';
                })
                ->html()
                ->sortable(),
            Column::make('Created at', 'created_at')
                ->sortable()
                ->format(
                    function ($value, $row, Column $column) {
                        return $row->created_at->isoFormat('MMM Do, YYYY');
                    }
                ),
            Column::make('Action')
                ->label(
                    fn($row, Column $column) => view('livewire-tables::components.actions', [
                        'editRoute' => route('cms.users.edit', $row->id),
                        'deleteRoute' => route('cms.users.destroy', $row->id),
                        'showRoute' => NULL,
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
        return User::query()
            ->select(['id', 'user_type'])
            ->whereNotIn('id', [1, auth()->id()])
            ->latest();
    }
}
