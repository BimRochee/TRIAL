<style>
    @import url('https://fonts.cdnfonts.com/css/akira-expanded');

    body {}

    li:hover a {
        color: #E98E15 !important;
    }

    .active-link {
        color: #E98E15 !important;
    }

    .content {
        margin-left: 263px;
        /* Adjust based on sidebar width */
        padding-top: 103px;
        /* Adjust based on header height */
    }

    .hidden {
        display: none;
    }

    .page-header {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .page-header .link-name {
        font-weight: bold;
        color: #E98E15;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        border: 1px solid transparent;
        padding: 10px;
        text-align: left;
    }

    table th {
        background-color: #f8f9fa;
    }

    .content #semi-header h3 {
        font-size: 14px;
        font weight: bold;
        display: inline-block;
    }

    .nav-link:hover+.sub-menu,
    .sub-menu:hover {
        display: block;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
        padding-top: 60px;
    }

    .modal-content {
        background-color: white;
        margin: 5% auto;
        padding: 50px;
        border: 1px solid #888;
        width: 90%; /* Increased width */
        max-width: 900px; /* Increased max-width */
        max-height: 800px; /* Adjusted max-height */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0;
    }

    .modal-header i {
        color: #E98E15; 
        font-size: 24px; 
        margin-right: 10px; 
    }

    .modal-header h2 {
        color: #E98E15;;
        flex-grow: 1;
        margin-right: 10px; 
        font-weight: 700;
        font-size: 18px;    
    }

    .modal-header p{
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        color: #878787;
    }

    .modal p {
        margin: 0px 0px 20px 30px;
        font-weight: 400;
        font-size: 12px;
        color: #878787;
    }

    .modal label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .modal input,
    .modal select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    .modal .form-group {
        display: flex;
        justify-content: space-between; /* Added space between columns */
        align-items: left;
        width: 100%;
    }

    .modal .form-group div {
        flex-basis: calc(50% - 20px); /* Each column takes half the width minus some space for margins */
        margin-right: 10px; /* Right margin for even spacing */
    }

    .modal .next-step {
        background-color: #E98E15;
        color: white;
        border: none;
        padding: 8px;
        border-radius: 2px;
        cursor: pointer;
        width: 25%;
        height: 35px;
        font-size: 14px;
        margin-left: auto;
    }
    .select2-container .select2-selection--multiple {
        width: 100%
        height: auto;
        min-height: 38px;
        font-size: 14px;
        border-radius: 2px;
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219 / var(--tw-border-opacity))

    }

    .custom-select2-dropdown {
        width: 100% !important; /* Ensures the dropdown matches the select element width */
    }
</style>

<div id="cacao-operation-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <i class='bx bx-arrow-back'></i>
            <h2>Create Farmer Account</h2>
            <p>Step 2 of 3</p>
        </div>
        
        <p>Register the details of the cacao operation.</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="cacao-form" method="post" action="{{ route('update.location.profile', $userId) }}">
            @csrf

            <div class="form-group">
                <div>
                    <label for="operationType">Type of Cacao Operation<span style="color:red;">*</span></label>
                    <select id="operationType" name="operationType" required>
                        <option value="" disabled selected>Select...</option>
                        <option value="private-owned">Private Owned</option>
                        <option value="government-owned">Government Owned</option>
                    </select>
                </div>
                <div>
                    <label for="totalCacaoHectare">Total Cacao Hectare<span style="color:red;">*</span></label>
                    <input type="number" id="totalCacaoHectare" name="totalCacaoHectare" placeholder="Total Hectares" required>
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="beansSold">Beans Being Sold<span style="color:red;">*</span></label>
                    <select id="beansSold" name="beansSold[]" multiple class="select2-multiple select2-container w-full p-2.5 mb-4 border border-red-700 rounded-md text-lg custom-select2-dropdown" required>
                        <option value="" disabled>Select...</option>
                        <option value="wet-beans">Wet Beans</option>
                        <option value="dry-fermented">Dry Fermented</option>
                        <option value="dry-unfermented">Dry Unfermented</option>
                    </select>
                </div>

                <div>
                    <label for="variety">Variety<span style="color:red;">*</span></label>
                    <select id="variety" name="variety[]" multiple class="select2-multiple" required>
                        <option value="" disabled>Select...</option>
                        <option value="criollo">Criollo</option>
                        <option value="forastero">Forastero</option>
                        <option value="trinitario">Trinitario</option>
                        <option value="nacional">Nacional</option>
                        <option value="mix">MIX</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="techniqueTechnology">Technique & Technology<span style="color:red;">*</span></label>
                    <select id="techniqueTechnology" name="techniqueTechnology[]" multiple class="select2-multiple w-full" required>
                        <option value="" disabled>Select...</option>
                        <option value="option-a">Option A</option>
                        <option value="option-b">Option B</option>
                        <option value="option-c">Option C</option>
                    </select>
                </div>
            </div>
            <div class="form-group pb-4">
                <div>
                    <label for="cacaoPractices">Cacao Practices<span style="color:red;">*</span></label>
                    <select id="cacaoPractices" name="cacaoPractices[]" multiple class="select2-multiple w-full" required>
                        <option value="" disabled>Select...</option>
                        <option value="option-a">Option A</option>
                        <option value="option-b">Option B</option>
                        <option value="option-c">Option C</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="next-step">Next Step</button>
        </form>
    </div>
</div>
