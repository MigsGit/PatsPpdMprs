<footer class="main-footer fixed-bottom">
    <div class="float-right d-none d-sm-block">
        <b id="footerTimer"></b>
    </div>
    <strong>Pricon Microelectronics Inc.</strong>
</footer>

<script type="text/javascript">
	setInterval( () => {
		var now = new Date();
		$("#footerTimer").text(now.toLocaleString('en-US', { timeZone: 'Asia/Manila' }));
	}, 1000);
</script>