@extends('layouts.products')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Продукты</h3>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                    <div class="row">
                        <div class="card col-8">
                            <div class="card-body table-responsive p-0" id="list">
                                <table class="table table-hover text-nowrap data-table">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Артикул</th>
                                            <th>Название</th>
                                            <th>Статус</th>
                                            <th>Атрибуты</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @if (isset($products))
                                            @foreach ($products as $item)
                                                <tr data-url="{{ route('product_show', $item->id) }}">
                                                    <td>{{ $item->ARTICLE }}</td>
                                                    <td>{{ $item->NAME }}</td>
                                                    <td>{{ $item->STATUS == 'available' ? 'Доступен' : 'Недоступен' }}</td>
                                                    <td>
                                                        @foreach (json_decode($item->DATA) as $value)
                                                            <div>{{ $value->name . ': ' . $value->value }}</div>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-4 justify-content-end">
                            <a href="{{ route('product_create') }}" class="btn btn-primary mb-3 ml-auto">Добавить </a>
                        </div>
                    </div>
            </div>
        </section>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Обрабатываем клик по строке таблицы и переходим по URL-адресу строки
        document.addEventListener('DOMContentLoaded', function() {
            let rows = document.querySelectorAll('tr[data-url]');
            rows.forEach(function(row) {
                row.addEventListener('click', function() {
                    let url = this.getAttribute('data-url');
                    window.location.href = url;
                });
            });
        });
    </script>
@endsection
