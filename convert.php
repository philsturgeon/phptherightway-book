<?php

$dirName = './web/_posts';
$outputDirName = '/Users/phil/Dropbox/phptherightway/manuscript';
// $outputDirName = './output';

$dir = new DirectoryIterator($dirName);

$contentArray = [];

foreach ($dir as $fileinfo) {
    if (!$fileinfo->getExtension() == 'md') {
        continue;
    }

    // Split the 00-00-00-Some-Content.md name into useful info
    preg_match('#(\d+)-(\d+)-(\d+)-([^\.]+).md#', $fileinfo->getFilename(), $nameParts);

    list(, $chapter, $section, $subSection, $chapterName) = $nameParts;

    echo "$chapter-$section-$subSection-$chapterName\n";

    $chapter = (int) $chapter;

    // Create this new chapter
    if (empty($contentArray[$chapter])) {
        $contentArray[$chapter] = '';
    }

    // Take this sub-section and shove it into the chapter content
    $subSectionContent = file_get_contents($dirName.'/'.$fileinfo->getFilename());

    // Strip the header out if there is one
    preg_match('/^---[\s\S]*---?/', $subSectionContent, $subSectionMatches);
    if (isset($subSectionMatches[0])) {
        $subSectionContent = str_replace($subSectionMatches[0], '', $subSectionContent);
    }

    // Switch the syntax highlighter
    $subSectionContent = preg_replace('/{% highlight (\S+) %}/', "\n{lang=\"\$1\"}\n~~~~~~~~", $subSectionContent);

    $subSectionContent = str_replace([
        '{% endhighlight %}',
        '(/pages/', // Convert links to pages
    ], [
        '~~~~~~~~',
        '(http://phptherightway.com/pages/'
    ], $subSectionContent);

    $contentArray[$chapter] .= $subSectionContent;
}

$bookTxtContent = "";

// Now output all that info to new markdown files
foreach ($contentArray as $chapterNum => $chapterContent) {
    file_put_contents("{$outputDirName}/converted/chapter{$chapterNum}.txt", $chapterContent);
    
    $bookTxtContent .= "converted/chapter{$chapterNum}.txt\n";
}

file_put_contents("{$outputDirName}/Book.txt", $bookTxtContent);
