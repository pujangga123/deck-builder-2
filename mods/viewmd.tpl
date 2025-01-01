<style>
    pre {
        padding: 5px;
        background-color: lightgray;
        margin: 5px 0;
    }
    body {
        font-family: serif;
    }
    h2,h3,h4,h5 {
        margin-bottom: 10px;
    }
    ol {
        margin-top: 5px;
    }
</style>

{if $style}
    <link rel="stylesheet" href="{$style}">
{/if}

{rlmarkdown text=$text}