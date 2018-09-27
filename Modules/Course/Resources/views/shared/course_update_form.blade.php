<form method="post" action="/course/{{$course['name']}}">
    {{ method_field('PUT') }}
    @include('shared.form_required', ['label' => 'Titel', 'name'=> 'name', 'type'=> 'text',
    'value' => $course['name'], 'class' => 'form-control'])
    @include('shared.textarea', ['label' => 'Beschrijving', 'name'=> 'description', 'type'=> 'text',
    'required' => true, 'rows' => 10, 'value' => $course['description'], 'class' => ''])
    @include('shared.form_required', ['label' => 'Organisatiekleur', 'name'=> 'color', 'type'=> 'color',
    'value' => $course['color']])
    @include('shared.form', ['label' => 'Cursusafbeelding', 'name' => 'media[]', 'type' => 'file',
    'value' => 'file', 'class' => ''])
    {{ csrf_field() }}
    @include('shared.submit_button')
</form>