<div class="progress mb-2">
  <div class="progress-bar" role="progressbar" style="width: {{ $progresses / $max * 100 }}%"
       aria-valuenow="{{ $progresses }}"
       aria-valuemin="0" aria-valuemax="{{ $max }}">{{ $progresses }} / {{ $max }}
  </div>
</div>