<h2 class="text-center page-header">Creeër een cursus</h2>
<div class="form-box rounded container">
  @if(isset($course))
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
    @else
      <form method="post" action="/course" enctype="multipart/form-data">
        @include('shared.form_required', ['label' => 'Titel', 'name'=> 'name', 'type'=> 'text',
        'class' => 'form-control'])
        @include('shared.textarea', ['label' => 'Beschrijving', 'name'=> 'description', 'type'=> 'text',
        'required' => true, 'rows' => 7, 'class' => ''])
        @include('shared.form_required', ['label' => 'Cursuskleur', 'name'=> 'color', 'type'=> 'color',
        'class' => 'w-25'])
        @include('shared.form', ['label' => 'Cursusafbeelding', 'name' => 'media[]', 'type' => 'file',
        'class' => ''])
    @endif
    {{ csrf_field() }}
    <div class="text-center">
      <input type="submit" value="aanmaken" class="btn mb-3" style="color: #004685; background-color: #d5a10f">
    </div>
  </form>
</div>