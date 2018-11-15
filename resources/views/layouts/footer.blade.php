<footer class="footer nav-organisation">
    <div class="container">
        <span class="organisation-text">Copyright &copy; 2018 CodingHighway</span>
    </div>
</footer>
<script type="text/javascript">
    @auth
        @if(!empty(Auth::user()->organisation()))
            hexToRgb("{{Auth::user()->organisation()->color }}");
            document.documentElement.style.setProperty("--redCustom", hexToRgb("{{Auth::user()->organisation()->color}}").r);
            document.documentElement.style.setProperty("--greenCustom", hexToRgb("{{Auth::user()->organisation()->color}}").g);
            document.documentElement.style.setProperty("--blueCustom", hexToRgb("{{Auth::user()->organisation()->color}}").b);
        @else
            hexToRgb('#FFFFFF');
            document.documentElement.style.setProperty("--redCustom", hexToRgb('#FFFFFF').r);
            document.documentElement.style.setProperty("--greenCustom",hexToRgb('#FFFFFF').g);
            document.documentElement.style.setProperty("--blueCustom", hexToRgb('#FFFFFF').b);
        @endif
    @endauth
</script>