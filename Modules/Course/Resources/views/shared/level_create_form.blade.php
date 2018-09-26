<form method="post" action="/course/level">
    @include('shared.form_required', ['label' => 'Moeilijkheid', 'name'=> 'name', 'type'=> 'text',
    'class' => 'form-control'])
    {{ csrf_field() }}
    @include('shared.submit_button')
</form>