# PHP The Right Way: eBook

[PHP The Right Way](http://www.phptherightway.com/) is an easy-to-read, quick
reference for PHP popular coding standards, links to authoritative tutorials
around the Web and what the contributors consider to be best practices at the
present time.

The website was created originally by [Josh Lockhart], and [Phil Sturgeon] later
joined in to write a bunch of content, and help keep on top of pull requests. He
also wrote this conversion script to turn phptherightway.com content into the
[LeanPub book], which is available entirely for free, or an optional donation,
100% of which goes to EFF. Josh and Phil get nothing.

Josh approves of this book.

## How it works

This is not meant to be a tool you use to make the ebook yourself. This tool
converts the Jekyll website in its file format and Jekyll flavor of Markdown,
to LeanPub Markdown (Markua) and a file format that will let LeanPub read this
as a book.

```
$ git clone --recursive https://github.com/philsturgeon/phptherightway-book.git
$ cd phptherightway-book
$ php convert.php
```

This will populate - or override - the contents of `manuscript/`. The only real
way to test if it worked is to shove it into LeanPub and run a preview, which is
something Phil usually does as he's the one who created the LeanPub app.

Give him a poke on Twitter if you think this book is due an update. Send a PR
to this repo if you notice a bug in the conversion process.

[Josh Lockhart]: http://www.joshlockhart.com/
[Phil Sturgeon]: https://philsturgeon.uk/
[LeanPub book]: https://leanpub.com/phptherightway
