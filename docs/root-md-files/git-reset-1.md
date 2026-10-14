---
title: "git reset 1"
type: note
status: draft
updated: 2026-10-07
tags: [docs, user, root-md-files]
qmd: "git reset 1 user"
---
#!/bin/sh
set -e
git config -f .gitmodules --get-regexp '^submodule\..*\.path$' |
    while read path_key path
    do
        url_key=$(echo $path_key | sed 's/\.path/.url/')
        url=$(git config -f .gitmodules --get "$url_key")
        echo $path
        echo $url
        
        
        
        git submodule add -f $url $path  
    done
    