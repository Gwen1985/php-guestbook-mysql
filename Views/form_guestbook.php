<div class="container border border-info mt-2 rounded-lg shadow-lg">
    <div class="row w-100">
        <div class="col col-sm mt-2">
            <!--   FIRST NAME   -->
            <label for="name-first" class=""></label>
            <input required type="text" id="name-first" name="name-first" value="<?php echo $nameFirst; ?>"
                   class="border border-secondary rounded-lg"
                   placeholder="First name:">
        </div>
        <div class="col col-sm mt-2">
            <!--   LAST NAME   -->
            <label for="name-last" class=""></label>
            <input required type="text" id="name-last" name="name-last" value="<?php echo $nameLast; ?>"
                   class="border border-secondary rounded-lg"
                   placeholder="Last name:">
        </div>
        <div class="col col-sm mt-2">
            <!--   TITTLE   -->
            <label for="title" class=""></label>
            <input required type="text" id="title" name="title" value="<?php echo $title; ?>"
                   class="border border-secondary rounded-lg" placeholder="Title">
        </div>
        <div class="col col-sm overflow-hidden mt-2">
            <button type="submit" id="submit" name="submit"
                    class="btn btn-primary rounded-lg">
                Post Message
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col col-sm">
            <label for="message" class="text-wrap"></label>
            <textarea required id="message" name="message"
                      class="border border-danger rounded-lg w-100"
                      placeholder="Message:"></textarea>
        </div>
    </div>
</div>

