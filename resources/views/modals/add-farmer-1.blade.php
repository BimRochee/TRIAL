<!-- resources/views/modals/farmer-modal.blade.php -->
<div id="farmer-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <i class='bx bx-arrow-back'></i>
            <h2>Create farmer account</h2>
            <p>Step 1 of 3</p>
        </div>
        
        <p>Manually register the account of the farmer.</p>
        <form method="post" action="{{ route('add.farmer.step1') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div>
                    <label for="firstName">First Name<span style="color:red;">*</span></label>
                    <input type="text" id="firstName" name="firstn" placeholder="First name" required>
                </div>
                <div>
                    <label for="lastName">Last Name<span style="color:red;">*</span></label>
                    <input type="text" id="lastName" name="lastn" placeholder="Last name" required>
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="barangay">Barangay<span style="color:red;">*</span></label>
                    <input type="text" id="barangay" name="barangay" placeholder="Barangay" required>
                </div>
                <div>
                    <label for="city">City<span style="color:red;">*</span></label>
                    <input type="text" id="city" name="city" placeholder="City" required>
                </div>
                <div>
                    <label for="province">Province<span style="color:red;">*</span></label>
                    <input type="text" id="province" name="province" placeholder="Province" required>
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="birthdate">Birthdate<span style="color:red;">*</span></label>
                    <input type="date" id="birthdate" name="birthdate" placeholder="mm/dd/yyyy" required>
                </div>
                <div>
                    <label for="civilStatus">Civil Status<span style="color:red;">*</span></label>
                    <select id="civilStatus" name="marital" required>
                        <option value="s">Single</option>
                        <option value="m">Married</option>
                        <option value="d">Divorced</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="next-step">Next Step</button>
        </form>
    </div>
</div>
