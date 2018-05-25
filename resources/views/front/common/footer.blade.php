@section('footer')
	<div class="pageTop"><a href="#Top" class="scroll">PageTop</a></div>
	<footer class="cmn-footer">
	  <div class="ft-logo"><a href="/"><img src="/front/images/common/logo.png" alt=""></a></div>
	  <ul class="ft-nav">
	    <li><a href="/skill/">店頭接客</a></li>
	    <li><a href="/card/">接客</a></li>
	    <li><a href="/webskill/detail/blogSNS_01/">WEB接客</a></li>
	    <li><a href="/information/">お知らせ</a></li>
	  </ul>
	  <p class="copy">COPYRIGHT © </p>
	</footer>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		var dimensionValue = '{{ Auth::user()->id }}';

		ga('create', '{{ env('GA_TRACKINGID', '') }}', 'auto');
		ga('send', 'pageview', {'dimension1':dimensionValue});
	</script>
@endsection
