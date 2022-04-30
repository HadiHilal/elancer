@csrf
<div class="form-group">

    <x-form.input label="Name" name="name" :value="$cat->name" />
</div>

<div class="form-group">
    <x-form.input label="Slug" name="slug" :value="$cat->slug"  readonly/>
</div>

<div class="form-group">

    <x-form.select label="Parent" name="parent_id" :array="$cats->pluck('name' , 'id')->toArray()" :selected="$cat->parent_id"  />

</div>
<div class="form-group">
    <button class="btn btn-block btn-success my-2" type="submit"> submit</button>
</div>