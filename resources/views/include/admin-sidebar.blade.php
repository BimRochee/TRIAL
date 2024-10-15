<div class="options" style="position: relative;">
    <nav>
        <ul style="list-style-type: none; padding: 0; margin-top: 70px;">
            <li class="account-pages" style="margin-left: 35px; font-weight: bold;">Main Menu</li>

            <li
                style="position: relative; display: block; width: 100%; display: flex; text-decoration: none; color: #979797;">
                <a href="{{ route('admin.dashboard') }}" class="nav-link" data-target=""
                    style="text-decoration: none; color: var(--black1); margin: 20px 0 15px 60px;">
                    <i class='bx bxs-dashboard' style='padding-right: 15px;'></i> Dashboard
                </a>
            </li>

            <li
                style="position: relative; display: block; width: 100%; display: flex; text-decoration: none; color: #979797;">
                <a href="{{ route('admin.transactions') }}" class="nav-link" data-target=""
                    style="text-decoration: none; color: var(--black1); margin: 20px 0 15px 60px;">
                    <i class='bx bxs-bar-chart-alt-2' style='padding-right: 15px;'></i> Transactions
                </a>
            </li>

            <li
                style="position: relative; display: block; width: 100%; display: flex; text-decoration: none; color: #979797; margin-bottom: 0px;">
                <a href="#" style="text-decoration: none; color: var(--black1); margin: 20px 0 0 60px;"
                    id="listMenu">
                    <i class='bx bxs-credit-card' style='padding-right: 15px; padding-bottom: 0;'></i> List
                </a>
                <ul class="sub-menu"
                    style="list-style: none; padding-left: 5px; margin-left: -18px; display: none; position: relative; top: 0; left: 0; width: max-content;"
                    id="submenu">
                    <div style="padding-top: 50px;"></div>
                    <li style="display: flex; align-items: center;">
                        <span style="position: relative;">
                            <i class='bx bxs-circle' style='font-size: 4px; position: absolute;'></i>
                            <a href="{{ route('farmers.list') }}"
                                style="text-decoration: none; color: var(--black1); font-size: 14px; padding-left: 20px;">Farmers</a>
                        </span>
                    </li>
                    <div style="padding: 10px;"></div>
                    <li style="display: flex; align-items: center; margin-bottom: -10px;">
                        <span style="position: relative;">
                            <i class='bx bxs-circle'
                                style='font-size: 4px; position: absolute; top: 50%; transform: translateY(-50%);'></i>
                            <a href="{{ route('consolidators.list') }}"
                                style="text-decoration: none; color: var(--black1); font-size: 14px; padding-left: 20px;">Consolidators</a>
                        </span>
                    </li>
                </ul>
            </li>

            <li
                style="position: relative; display: block; width: 100%; display: flex; text-decoration: none; color: #979797;  ">
                <a href="{{ route('batch.index') }}" class="nav-link" 
                    style="text-decoration: none; color: var(--black1); margin: 35px 0 15px 60px; ">
                    <i class='bx bxs-layer' style='padding-right: 15px;'></i>Batch
                </a>
            </li>
            <li
                style="position: relative; display: block; width: 100%; display: flex; text-decoration: none; color: #979797;">
                <a href="#" class="nav-link" data-target="manage-request-content"
                    style="text-decoration: none; color: var(--black1); margin: 20px 0 15px 60px;">
                    <i class='bx bxs-file' style='padding-right: 15px;'></i>Manage Request
                </a>
            </li>
            <li class="account-pages" style="margin-left: 35px; margin-top: 20px; font-weight: bold;">Account
                Pages</li>
            <li
                style="position: relative; display: block; width: 100%; display: flex; text-decoration: none; color: #979797; margin: 20px 0;">
                <a href="#" class="nav-link" data-target="profile-content"
                    style="text-decoration: none; color: var(--black1); margin: 0px 0 0 60px;
                padding-top: 10px;">
                    <i class='bx bxs-user' style='padding-right: 15px;'></i>Profile
                </a>
            </li>
            <li
                style="position: relative; display: block; width: 100%; display: flex; text-decoration: none; color: #979797; margin: 20px 0;">
                <a href="#" class="nav-link" data-target="settings-content"
                    style="text-decoration: none; color: var(--black1); margin: 20px 0 0 60px;">
                    <i class='bx bxs-wrench' style='padding-right: 15px;'></i>Settings</a>
            </li>
            <li
                style="position: relative; display: block; width: 100%; display: flex; text-decoration: none; color: #979797; margin: 20px 0;">
                <a href="#" class="nav-link" data-target="faqs-content"
                    style="text-decoration: none; color: var(--black1); margin: 20px 0 0 60px;">
                    <i class='bx bxs-rocket' style='padding-right: 15px;'></i>FAQs</a>
            </li>
        </ul>

        <script>
            //NEW SUBMENU FUNCTION
            document.getElementById('listMenu').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior
                const submenu = document.getElementById('submenu');
                // Toggle the display property between block and none
                if (submenu.style.display === 'none' || submenu.style.display === '') {
                    submenu.style.display = 'block';
                } else {
                    submenu.style.display = 'none';
                }
            });
        </script>
    </nav>
</div>
