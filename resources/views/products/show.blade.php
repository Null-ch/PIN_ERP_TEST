@extends('layouts.products')
@section('content')
    <div class="content-wrapper">
        <section class="ml-20">
            
            <div class="col-16">
                <div class="card">
                    <div class="card-body" id="list">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3>{{ $product->NAME }}
                                </div>
                                <div class="buttons">
                                    <a href="{{ route('product_edit', $product->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('product_delete', $product->id) }}"><i class="fas fa-trash-alt"></i></a>
                                    <a href="{{ url()->previous() }}"><i class="fas fa-times"></i></a>
                                </div>
                            </div></h3>
                        <div class="row">{{ 'Название: ' . $product->NAME }}</div>
                        <div class="row">{{ 'Артикул: ' . $product->ARTICLE }}</div>
                        <div class="row">{{ 'Статус: ' . $product->STATUS }}</div>
                        <div class="row">
                            <div>Атрибуты:</div>
                            <div class="attributes">
                                @foreach (json_decode($product->DATA) as $value)
                                    <div>{{ $value->name . ': ' . $value->value }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
    <style>
        .attributes {
            display: flex;
            flex-direction: column;
            margin-left: 10px;
        }

        .row {
            display: flex;
            align-items: flex-start;
            margin-left: 10px;
            /* Выравнивание элементов по вертикали */
        }

        .buttons a {
            margin: 0 5px;
        }
    </style>
@endsection
