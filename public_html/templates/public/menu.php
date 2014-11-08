<div id="navBarEntire">
    <div class="navBarStickyFade"></div>
    <header id="navBar">
        <a name="menu"></a>
        <div>
            <ul>
                <li><a class="navBarLink" href="/#top">H</a></li>
                <li><a class="navBarLink" href="/#about">About</a></li>
                <li><a class="navBarLink" href="/#education">Education</a></li>
                <li><a class="navBarLink" href="/#jobs">Jobs</a></li>
                <li><a class="navBarLink" href="/#skills">Skills</a></li>
                <li><a class="navBarLink" href="/#portfolio">Portfolio</a></li>
                <li><a class="navBarLink" href="/#contact">Contact</a></li>
                <?if (empty($user)):?>
                    <li><a class="navBarLink" href="/blog">Blog</a></li>
                <?else:?>
                    <li><a class="navBarLink" href="/blogAdmin">Blog</a></li>
                    <li><a class="navBarLink admin" href="/blogNew">New</a></li>
                    <li><a class="navBarLink admin" href="/settings">Settings</a></li>
                    <li><a class="navBarLink admin" href="/logout">Logout</a></li>
                <?endif;?>
                <?if (!empty($user)):?>
                <p>Hi <?=$user?>
                <?endif;?>
                <?if (!empty($displayName)):?>
                <p>Hi <?=$displayName?>
                <?endif;?>
            </ul>
        </div>
        <a class="navBarLink" id="downloadResumeButton" href="resume.pdf">Download Resume</a>
    </header>
</div>