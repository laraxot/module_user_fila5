---
title: "git reset"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "git reset"
issues: []
discussions: []
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
    