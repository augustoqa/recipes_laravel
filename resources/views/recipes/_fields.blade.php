<div class="form-group col-sm-12 col-md-6">
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ $recipe->title ?? '' }}" id="title" class="form-control">
</div>
<div class="form-group col-sm-12 col-md-6">
    <label for="type">Class of Recipe</label>
    <select name="types" id="type" class="form-control">
        @foreach ($types as $type)
            <option value="{{ $type->id }}"
                {{ ! isset($recipe) ?: ( $type->isItself($recipe) ? ' selected' : '' ) }}>
                {{ $type->description }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-12">
    <label for="preparation">Preparation</label>
    <textarea name="preparation" id="preparation" cols="40" rows="5" class="form-control">{{ $recipe->preparation ?? '' }}</textarea>
</div>
<div class="form-group col-sm-12">
    <label for="notes">Notes</label>
    <textarea name="notes" id="notes" cols="40" rows="4" class="form-control">{{ $recipe->notes ?? '' }}</textarea>
</div>
