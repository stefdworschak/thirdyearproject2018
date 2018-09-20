# iNominate

## Git Instructions

### Getting Started

To set up the git directory on your workstation follow these instructions:

1) Open a new Explorer Window
2) Right click and select "Git Bash here"
3) Copy or write the below line in the command window

```
git clone https://github.com/stefdworschak/iNominate.git
```

### Creating your own development branch

To check existing branches
```
git branch -a
```
To create your own branch (this should be a unique name)
```
git branch new_branch_name
```
To move to your new branch (same works for master)
```
git checkout new_branch_name
```

### Checking the status of your branch

```
git status
```

### Every time before starting to work

Before you start working on any new code pull the newest version of the master file.
If you forgot to merge your branch with the master, then this will overwrite your changes.

```
git pull origin master
```

### When you are finished with your changes

When working on code try to do this every so often in order to keep the repository updated

To add all modified files to git
```
git add .
git commit -am "Note what changes you made"
```

Once you have added all your files and commited your changes you want to merge your changes with the master branch
```
git checkout master
git merge new_branch_name
```

### Resolving Conflicts
If you and somebody else have modified the same line(s) of code there will be conflicts in the merge request.

Here an example error message you would encounter in the command line:
```
Auto-merging styles.css
CONFLICT (content): Merge conflict in styles.css
Automatic merge failed; fix conflicts and then commit the result.
```

Here the master file:
```
body {
    font-size:1em;
    margin:5px  
}
```

Here the file on new_branch_name:
```
body {
    font-size:1em;
    padding:5px;
}
```

Now this would be the result of the merge:

```
body {
    font-size:1em;
<<<<<<< HEAD
    margin:5px  
=======
    padding:5px;
>>>>>>> new_branch_name
}
```

To fix the merge conflict remove the unncessary parts like so:

```
body {
    font-size:1em;
    margin:5px  
    padding:5px;
}
```

One of the complex problems is that there can be multiple of these merge requests and it can get very complex to resolve them. In an emergency you can roll back your merge request and start again.

Here instructions from github how to resolve a merge conflict using the command line:
https://help.github.com/articles/resolving-a-merge-conflict-using-the-command-line/
Here a youtube video explaining the process of manually resolving merge conflicts:
https://www.youtube.com/watch?v=__cR7uPBOIk
