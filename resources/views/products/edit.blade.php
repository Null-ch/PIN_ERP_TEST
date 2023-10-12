@extends('layouts.products')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('product_update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <h1>{{ 'Редактировать ' . $product->NAME }}</h1>
                        <label for="ARTICLE">Артикул:</label>
                        <input type="text" class="form-control" id="ARTICLE" name="ARTICLE" value="{{ $product->ARTICLE }}" required>
                        @error('ARTICLE')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="NAME">Название:</label>
                        <input type="text" class="form-control" id="NAME" name="NAME" value="{{ $product->NAME }}" required>
                        @error('NAME')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="status">Статус:</label>
                        <select class="custom-select form-control-border border-width-2" id="status" name="STATUS" required>
                            <option value="{{ $product->STATUS }}">{{ $product->STATUS == 'available' ? 'Доступно' : 'Недоступно' }}</option>
                            @foreach ($statuses as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <h2>Атрибуты</h2>
                        <div class="attribute-wrapper col-6">
                            @php
                                $i = 1;
                            @endphp
                            @foreach (json_decode($product->DATA) as $item)
                                <div class="input-wrapper" style="display: flex; flex-direction: row; align-items: center;">
                                    <div style="display: flex; flex-direction: column; width: 50%; margin-right: 10px;">
                                        <p>Название</p>
                                        <input type="text" name="{{ 'attribute_name_' . $i }}" class="form-control attribute-name" value="{{ $item->name }}">
                                    </div>
                                    <div style="display: flex; flex-direction: column; width: 50%;">
                                        <p>Значение</p>
                                        <input type="text" name="{{ 'attribute_value_' . $i }}" class="form-control attribute-value" value="{{ $item->value }}">
                                    </div>
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                        <div id="attributesContainer" class="input-wrapper"></div>
                        <div>
                            <a href="#" id="addAttribute">+ Добавить атрибут</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script>
        var attributeCounter = {{ $i ? $i : 0 }};

        // Обработчик события для кнопки "Добавить атрибут"
        document.getElementById("addAttribute").addEventListener("click", function(event) {
            event.preventDefault();

            // Увеличиваем счетчик
            attributeCounter++;

            // Создаем элементы для инпута с названием и значением атрибута
            var attributeWrapper = document.createElement("div");
            attributeWrapper.className = "attribute-wrapper";

            var attributeNameInput = document.createElement("input");
            attributeNameInput.type = "text";
            attributeNameInput.className = "form-control attribute-name";
            attributeNameInput.placeholder = "Название";
            attributeNameInput.name = "attribute_name_" + attributeCounter; // Добавляем счетчик к имени инпута

            var attributeValueInput = document.createElement("input");
            attributeValueInput.type = "text";
            attributeValueInput.className = "form-control attribute-value";
            attributeValueInput.placeholder = "Значение";
            attributeValueInput.name = "attribute_value_" + attributeCounter; // Добавляем счетчик к имени инпута

            var removeButton = document.createElement("button");
            removeButton.innerHTML = "<i class='fa fa-trash'></i>";
            removeButton.className = "remove-attribute";

            // Обработчик события для кнопки удаления
            removeButton.addEventListener("click", function() {
                attributeWrapper.remove();
            });

            var attributeRow = document.createElement("div");
            attributeRow.className = "row mt-2 input-wrapper";
            var attributeCol1 = document.createElement("div");
            attributeCol1.className = "col-3";
            var attributeCol2 = document.createElement("div");
            attributeCol2.className = "col-3";

            attributeCol1.appendChild(attributeNameInput);
            attributeCol2.appendChild(attributeValueInput);

            attributeRow.appendChild(attributeCol1);
            attributeRow.appendChild(attributeCol2);
            attributeRow.appendChild(removeButton);

            attributeWrapper.appendChild(attributeRow);
            document.getElementById("attributesContainer").appendChild(attributeWrapper);
        });
    </script>
@endsection
