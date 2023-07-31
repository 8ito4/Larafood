@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="nome:" value="{{ $plan->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Preco:</label>
    <input type="text" name="price" class="form-control" placeholder="Preco:" value="{{ $plan->price ?? '' }}">
</div>
<div class="form-group">
    <label>Descricao:</label>
<input type="text" name="description" class="form-control" placeholder="Descricao:" value="{{ $plan->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="Submit" class="btn btn-dark">Enviar</button>
</div>