<form method="post" action="/course" enctype="multipart/form-data">
    @include('shared.form_required', ['label' => 'Titel', 'name'=> 'name', 'type'=> 'text',
    'class' => 'form-control'])
    @include('shared.textarea', ['label' => 'Beschrijving', 'name'=> 'description', 'type'=> 'text',
    'required' => true, 'rows' => 7, 'class' => ''])
    @include('shared.form_required', ['label' => 'Cursuskleur', 'name'=> 'color', 'type'=> 'color',
    'class' => 'w-25'])
    @include('shared.form', ['label' => 'Cursusafbeelding', 'name' => 'media', 'type' => 'file',
    'class' => ''])
    {{ csrf_field() }}
    @include('shared.submit_button')
</form>
