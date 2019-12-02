<tr>
    <!-- On the id js code will be exucutable -->
    <td id="libor"><?php echo $LIBOR_1mo_one_month; ?></td>
    <td id="libor1"><?php echo $LIBOR_2mo_yesterday; ?></td>
    <td id="libor2"><?php echo $LIBOR_3mo_yesterday; ?></td>
</tr>

<script>
    /* LIBOR Index */
    let date = new Date();
    let day = date.getDay();
    let liborIndex = document.getElementById("libor");
    let liborIndex1 = document.getElementById("libor1");
    let liborIndex2 = document.getElementById("libor2");

    if(day === 6 || day === 7) {
        liborIndex.innerHTML = " - ";
    } else {
        liborIndex.innerHTML = "<?php echo $LIBOR_1mo_one_month; ?>";
    }

    if(day === 6 || day === 7) {
        liborIndex1.innerHTML = " - ";
    } else {
        liborIndex1.innerHTML = "<?php echo $LIBOR_2mo_yesterday; ?>";
    }

    if(day === 6 || day === 7) {
        liborIndex2.innerHTML = " - ";
    } else {
        liborIndex2.innerHTML = "<?php echo $LIBOR_3mo_yesterday; ?>";
    }
    /* END LIBOR Index */
</script>