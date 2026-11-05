<?php

test('command pembuatan database dilewati untuk sqlite', function () {
    $this->artisan('cms:ensure-database')->assertSuccessful();
});
