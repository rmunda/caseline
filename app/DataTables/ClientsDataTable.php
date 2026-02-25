<?php

namespace App\DataTables;

use App\Models\Client;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ClientsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Client> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'clients.action')
            ->addColumn('full_name', function ($row) {
                // Combines first, middle, and last names, removing extra spaces if middle is empty
                return trim("{$row->first_name} {$row->middle_name} {$row->last_name}");
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at
                    ? $row->created_at->format('d M Y h:i A')
                    : '';
            })
            // Add this to make the new column searchable
            ->filterColumn('full_name', function($query, $keyword) {
                $sql = "CONCAT(first_name, ' ', IFNULL(middle_name, ''), ' ', last_name) LIKE ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Client>
     */
    public function query(Client $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('clients-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                     ->language([
                        'search' => '',
                        'searchPlaceholder' => 'Search clients...'
                    ])
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
            Button::make('csv'),
            Button::make('pdf'),
            Button::make('print'),
            Button::make('reset'),
            Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            // New combined column
            Column::make('full_name')->title('Name'),

            // Removed first_name and last_name from here
            // Column::make('first_name'),
            // Column::make('last_name'),
            Column::make('gender'),
            Column::make('city_town'),
            Column::make('state'),
            Column::make('created_at')->title('Created on'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-left'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Clients_' . date('YmdHis');
    }
}
