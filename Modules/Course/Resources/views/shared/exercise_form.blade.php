@if(isset($exercise))
    <form method="post" action="/course/{{$course['name']}}/exercise">
        {{ method_field('PUT') }}
        @include('shared.textarea', ['label' => 'Inhoud', 'name'=> 'description', 'type'=> 'text', 'required' => true, 'rows' => 10, 'value' => $course['description']])
        @include('shared.form_required', ['label' => 'Organisatiekleur', 'name'=> 'color', 'type'=> 'color', 'value' => $course['color']])
        @include('shared.form', ['label' => 'Cursusafbeelding', 'name' => 'media[]', 'type' => 'file', 'value' => 'file'])
@else
    <form method="post" action="/course" enctype="multipart/form-data">
        @include('shared.form_required', ['label' => 'Titel', 'name'=> 'name', 'type'=> 'text'])
        @include('shared.textarea', ['label' => 'Beschrijving', 'name'=> 'description', 'type'=> 'text', 'required' => true, 'rows' => 10])
        @include('shared.form_required', ['label' => 'Cursuskleur', 'name'=> 'color', 'type'=> 'color'])
        @include('shared.form', ['label' => 'Cursusafbeelding', 'name' => 'media[]', 'type' => 'file'])
        @endif
        {{ csrf_field() }}
        <input type="submit" value="aanmaken">
    </form>