<script>
$(document).ready( function () {
    $('#CustomerTable').DataTable({
    processing:true,
   // serverSide: true,
    orderMulti:true,
    "ordering": false/*This line disbles the ordering */
    });
} );
</script>
</body>
</html