<body class="midden">
    <div class="margin mid">
        <form action="data/admindata.php" method="post">

            <label class="mid">productnaam</label>
            <input class="width100" type="text" name="productnaam">


            <label class="mid">beschrijving</label>
            <input class="width100" type="text" name="beschrijving">


            <label class="mid">prijs</label>
            <input class="width100" type="text" name="prijs">


            <label class="mid">img</label>
            <input class="width100" type="text" name="img">

            <input class="width100" type="submit">


        </form>
    </div>
</body>

<style>
    .mid {
        display: flex;
        justify-content: center;
    }

    .width100 {
        width: 100%;
    }
</style>