<form method="post" action="/course/level">
    @include('shared.form_required', ['label' => 'Moeilijkheid', 'value' => $level['name'], 'name'=> 'name', 'type'=> 'text',
    'class' => 'form-control'])
    {{ csrf_field() }}
    <div class="text-center">
        <input type="submit" value="aanmaken" class="btn mb-3" style="color: #004685; background-color: #d5a10f">
    </div>
</form>