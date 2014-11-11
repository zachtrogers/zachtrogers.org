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
                <li><a class="navBarLink" href="/blog">Blog</a></li>
                <?if (empty($user)):?>
            </ul>
        </div>
        <a class="navBarLink" id="downloadResumeButton" href="resume.pdf">Download Resume</a>
                <?else:?>
                    <li id="adminMenu">
                        <a class="navBarLink admin" href="/blogNew">New Blog</a>
                        <a class="navBarLink admin" href="/portfolio">New Portfolio</a>
                        <a class="navBarLink admin" href="/settings">Settings</a>
                        <a class="navBarLink admin" href="/logout">Logout</a>
                    </li>
                    <li id="adminMenu">
                        <p>Logged in as:</p>
                        <br/>
                        <p><?=$displayName?></p>
                    </li>
            </ul>
        </div>
        <?endif;?>
    </header>
</div>
<div id="navBarEntireMobile">
    <header id="navBarMobile">
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
                <li><a class="navBarLink" href="/blog">Blog</a></li>
                <?if (empty($user)):?>
            </ul>
        </div>
                <?else:?>
                    <li id="adminMenu">
                        <a class="navBarLink admin" href="/blogNew">New Blog</a>
                        <a class="navBarLink admin" href="/portfolio">New Portfolio</a>
                        <a class="navBarLink admin" href="/settings">Settings</a>
                        <a class="navBarLink admin" href="/logout">Logout</a>
                    </li>
                    <li id="adminMenu">
                        <p>Logged in as:</p>
                        <br/>
                        <p><?=$displayName?></p>
                    </li>
            </ul>
        </div>
        <?endif;?>
    </header>
</div>