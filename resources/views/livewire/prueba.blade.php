<div>
    <div>
        <select class="js-example-basic-multiple-limit" style="width: 100%;" name="states[]" multiple="multiple">
            <option value="Extractos">Dolor de muelas</option>
            <option value="Planta en Frasco">Dolor de encías</option>
            <option value="Tabletas">Hipo</option>
        </select>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".js-example-basic-multiple-limit").select2({});
        });
    </script>
</div>
