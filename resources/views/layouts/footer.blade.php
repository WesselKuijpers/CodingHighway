<footer class="footer nav-organisation">
    <div class="container">
        <span class="organisation-link">Copyright &copy; 2018 CodingHighway</span>
    </div>
</footer>
<script type="text/javascript">
    //Calculating all fonts depending on their background colors
    @auth
        // Organisation
        @if(!empty(Auth::user()->organisation()))
            document.documentElement.style.setProperty("--organisationRed", hexToRgb("{{Auth::user()->organisation()->color}}").r);
            document.documentElement.style.setProperty("--organisationBlue", hexToRgb("{{Auth::user()->organisation()->color}}").g);
            document.documentElement.style.setProperty("--organisationGreen", hexToRgb("{{Auth::user()->organisation()->color}}").b);
        @else
            hexToRgb('#FFFFFF');
            document.documentElement.style.setProperty("--organisationRed", hexToRgb('#FFFFFF').r);
            document.documentElement.style.setProperty("--organisationBlue",hexToRgb('#FFFFFF').g);
            document.documentElement.style.setProperty("--organisationGreen", hexToRgb('#FFFFFF').b);
        @endif
    @endauth
</script>