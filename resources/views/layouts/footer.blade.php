<footer class="footer" style="@if(Auth::user() && !empty(Auth::user()->organisation())) {{ "background-color:".Auth::user()->organisation()->color }} @endif">
    <div class="container">
        <span style="@if(Auth::user() && !empty(Auth::user()->organisation())) {{ "color:".Auth::user()->organisation()->fontcolor }} @endif">Copyright &copy; 2018 CodingHighway</span>
    </div>
</footer>