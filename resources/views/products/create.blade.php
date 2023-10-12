@extends('layouts.products')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('product_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h1>Добавить продукт</h1>
                        <label for="ARTICLE">Артикул:</label>
                        <input type="text" class="form-control" id="ARTICLE" name="ARTICLE" required>
                        @error('ARTICLE')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="NAME">Название:</label>
                        <input type="text" class="form-control" id="NAME" name="NAME" required>
                        @error('NAME')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="status">Статус:</label>
                        <select class="custom-select form-control-border border-width-2" id="status" name="STATUS" required>
                            @foreach ($statuses as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <h2>Атрибуты</h2>
                        <div id="attributesContainer"></div>
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
        var attributeCounter = 0;
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
            attributeRow.className = "row mt-2";
            var attributeCol1 = document.createElement("div");
            attributeCol1.className = "col";
            var attributeCol2 = document.createElement("div");
            attributeCol2.className = "col";

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
