# 'PHP The "Right" Way' eBook

This repository contains the conversion script to turn phptherightway.com content into LeanPub Markdown, which is then put into `manuscript/` and LeanPub build the book.

## Contribution

Recursively clone this repository, as you will need the `web/` submodule. The `web/` folder is a clone of the 
[phptherightway.com](http://phptherightway.com) website, and will be read by `convert.php`. It uses some really cheap
and crappy regex and string manipulation to convert Jekyll tags into LeanPub tags, then we just hope the Markdown
doesn't have weird inconsistencies. 

Please note that if you make changes to any `.txt.` files in the `manuscript/` folder they will be lost next time `convert.php` is run. Instead, make changes to the website repository (via the submodule or however) then send a PR
to the main repo.

Once your website change is merged, you can update the book by doing the following:

```
$ git clone --recursive https://github.com/philsturgeon/phptherightway-book.git
$ cd phptherightway-book
$ php convert.php 
```

With that done, commit the results and send a pull request. Or, you can wait until I do another build and it will be 
included.

## Licence

The script is mine, but the book and the website itself is copyright to Josh Lockhart. The website, book and this script - are licenced under a [Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License](http://creativecommons.org/licenses/by-nc-sa/3.0/).
