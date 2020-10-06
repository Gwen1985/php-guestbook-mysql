<?php

$guestbookItems = Guestbook::getPosts();

foreach ($guestbookItems as $guestbookItem) {
    ?>
    <div class=" container-sm border border-info mt-2 rounded-lg shadow-lg">
        <div class="">
            <span class="d-flex justify-content-center">
                <?php echo $guestbookItem['FirstName']; ?>
            </span>
        </div>

        <div class="">
            <span class="d-flex justify-content-center">
                <?php echo $guestbookItem['LastName']; ?>
            </span>
        </div>

        <div class="d-flex justify-content-center">
            <span class="">
                <?php echo $guestbookItem['Date'] . '<br>'; ?>
            </span>
        </div>

        <div class="d-flex justify-content-center">
            <span class="text-primary font-weight-bold">
                 <?php echo $guestbookItem['Title']; ?>
                <hr>
            </span>
        </div>

        <p class="">
            <span class="d-flex justify-content-center">
                <?php echo $guestbookItem['Message']; ?>
            </span>
        </p>
    </div>

    <?php
}

?>