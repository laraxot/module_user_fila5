---
title: "Git Reset"
type: concept
tags: [git, reset]
created: 2026-07-14
updated: 2026-07-14
qmd: "git-reset git reset"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
<<<<<<< .merge_file_GrQ6Pn
  - "./00-index.md"
=======
  - "./00-index-indice-documentazione-modulo-user.md"
>>>>>>> .merge_file_Nw6SWN
  - "./00-index.md"
  - "./2fa-guide.md"
  - "./2fa.md"
  - "./accessor-delegation-pattern.md"
<<<<<<< .merge_file_GrQ6Pn
  - "./actions-path-convention.md"
  - "./actions-path-convention.md"
  - "./actions-path-convention.md"
=======
  - "./actions-path-convention.md"
  - "./actions-path-convention-convenzione-percorsi.md"
  - "./actions-path-convention.md"
status: draft
>>>>>>> .merge_file_Nw6SWN
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
    