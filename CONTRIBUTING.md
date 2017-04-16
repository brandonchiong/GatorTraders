# Contributing

When contributing to this repository, please first discuss the change you wish to make via issue,
email, or any other method with the owners of this repository before making a change. 

Please note we have a code of conduct, please follow it in all your interactions with the project.

## How to Contribute

### Cloning

To clone a branch the easiest solution is to use [SSH keys](https://help.github.com/articles/connecting-to-github-with-ssh/). 

After generating and adding go ahead and clone the repository into the ~/public_html folder of you personal account on the AWS.


### Branch Creation

The main branch that will be keeping changes and displayed for deployment purpouses is the dev branch. This branch will be the one that you create new branches from.

**To create and switch to a new branch:**

`git checkout -b follow_guidelines_below_for_branch_nomenclature`

Branch naming will be simple. It begins with choosing the MVC structure that will be worked on. Followed by the file name that is created in the project. Followed by the overall feature created or modified.

Example:

`git checkout -b View_welcome_creating_intial_layouts`

**After creating please push the branch to GitHub:**

`git push --set-upstream origin [branch name]`

Once the branch is created and pushed it is good to be edited.

### Branch Progression

**Beginning work on branches or starting for the day:**
1. Check current branch:
	`git status`

2. Checkout or create branch if needed:
	`git checkout [branch_name]`
	or see [Branch Creation](#branch-creation)

3. Update the branch from the current iteration of dev:
	`git fetch`

4. Resolve merge conflicts

5. Start working on branch

**During or after editing in a branch:**

1. Modify to the CHANGELOG in the project root to reflect the changes you have made to the structure of the program.
**Example:** 
`* Added Navigation Bar to gatortraders/app/Resources/view/base.html.twig`

2. Commit messages should be meaningful. 
**Example:** 
`git commit -m "Added a javascript action to accomodate contextual menu transitions."`

3. Push your changes even if they are not complete when you're done for the day. **Example:** `git commit -m "EOD: Incomplete branch. Working on controller for docterine"

### Branch Finalization

Follow [Branch Progression](#branch-progression)

After you have completed a branch. Have someone pull that branch to their server account and test it on their account.

1. Pull the branch and deploy on personal server account. 'git checkout [branch_name]'

2. Once completed add under CHANGELOG in the project root the user that verified the working branch.

3. Create a pull request


## Code of Conduct

### Our Pledge

In the interest of fostering an open and welcoming environment, we as
contributors and maintainers pledge to making participation in our project and
our community a harassment-free experience for everyone, regardless of age, body
size, disability, ethnicity, gender identity and expression, level of experience,
nationality, personal appearance, race, religion, or sexual identity and
orientation.

### Our Standards

Examples of behavior that contributes to creating a positive environment
include:

* Using welcoming and inclusive language
* Being respectful of differing viewpoints and experiences
* Gracefully accepting constructive criticism
* Focusing on what is best for the community
* Showing empathy towards other community members

Examples of unacceptable behavior by participants include:

* The use of sexualized language or imagery and unwelcome sexual attention or
advances
* Trolling, insulting/derogatory comments, and personal or political attacks
* Public or private harassment
* Publishing others' private information, such as a physical or electronic
  address, without explicit permission
* Other conduct which could reasonably be considered inappropriate in a
  professional setting

### Our Responsibilities

Project maintainers are responsible for clarifying the standards of acceptable
behavior and are expected to take appropriate and fair corrective action in
response to any instances of unacceptable behavior.

Project maintainers have the right and responsibility to remove, edit, or
reject comments, commits, code, wiki edits, issues, and other contributions
that are not aligned to this Code of Conduct, or to ban temporarily or
permanently any contributor for other behaviors that they deem inappropriate,
threatening, offensive, or harmful.

### Scope

This Code of Conduct applies both within project spaces and in public spaces
when an individual is representing the project or its community. Examples of
representing a project or community include using an official project e-mail
address, posting via an official social media account, or acting as an appointed
representative at an online or offline event. Representation of a project may be
further defined and clarified by project maintainers.

### Enforcement

Instances of abusive, harassing, or otherwise unacceptable behavior should be
reported by contacting the project team lead at eterry@mail.sfsu.edu. All
complaints will be reviewed and investigated and will result in a response that
is deemed necessary and appropriate to the circumstances. The project team is
obligated to maintain confidentiality with regard to the reporter of an incident.
Further details of specific enforcement policies may be posted separately.

Project maintainers who do not follow or enforce the Code of Conduct in good
faith may face temporary or permanent repercussions as determined by other
members of the project's leadership.

### Attribution

This Code of Conduct is adapted from the [Contributor Covenant][homepage], version 1.4,
available at [http://contributor-covenant.org/version/1/4][version]

[homepage]: http://contributor-covenant.org
[version]: http://contributor-covenant.org/version/1/4/