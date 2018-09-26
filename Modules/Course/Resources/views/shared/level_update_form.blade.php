<form method="post" action="/course/level">
    @include('shared.form_required', ['label' => 'Moeilijkheid', 'value' => $level['name'], 'name'=> 'name', 'type'=> 'text',
    'class' => 'form-control'])
    {{ csrf_field() }}
    @include('shared.submit_button')
</form>