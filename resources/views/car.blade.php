<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Selector</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            background: #f9f9f9;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        select:focus {
            border-color: #007bff;
            outline: none;
        }

        #selectedCarData {
            margin-top: 20px;
        }

        #selectedCarData h2 {
            text-align: center;
            color: #333;
        }

        #selectedCarData p {
            font-size: 18px;
            color: #555;
            margin: 5px 0;
            text-align: center;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px 20px;
            }

            h1 {
                font-size: 24px;
            }

            select {
                font-size: 14px;
            }

            #selectedCarData p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Select Your Car</h1>
        <form>
            <div class="form-group">
                <label for="carCompany">Car Company:</label>
                <select id="carCompany">
                    <option value="">Select Car Company</option>
                </select>
            </div>
            <div class="form-group">
                <label for="carModel">Car Model:</label>
                <select id="carModel">
                    <option value="">Select Car Model</option>
                </select>
            </div>
            <div class="form-group">
                <label for="carVariant">Car Variant:</label>
                <select id="carVariant">
                    <option value="">Select Car Variant</option>
                </select>
            </div>
        </form>

        <div id="selectedCarData">
            <h2>Selected Car:</h2>
            <p id="selectedCarCompany">Company: N/A</p>
            <p id="selectedCarModel">Model: N/A</p>
            <p id="selectedCarVariant">Variant: N/A</p>
        </div>
    </div>

    <script>
        // Simulated database
        const carDatabase = {
            "Toyota": {
                "Camry": ["LE", "SE", "XLE"],
                "Corolla": ["L", "LE", "SE"],
                "RAV4": ["LE", "XLE", "Limited"]
            },
            "Honda": {
                "Accord": ["LX", "Sport", "EX"],
                "Civic": ["LX", "Sport", "EX"],
                "CR-V": ["LX", "EX", "Touring"]
            },
            "Ford": {
                "F-150": ["XL", "XLT", "Lariat"],
                "Mustang": ["EcoBoost", "GT", "Mach 1"],
                "Explorer": ["XLT", "Limited", "ST"]
            },
            "BMW": {
                "X3": ["sDrive30i", "xDrive30i", "M40i"],
                "X5": ["sDrive40i", "xDrive40i", "M50i"],
                "3 Series": ["330i", "M340i", "330e"]
            },
            "Mercedes": {
                "C-Class": ["C300", "C43 AMG", "C63 AMG"],
                "E-Class": ["E350", "E450", "AMG E53"],
                "GLC": ["GLC 300", "GLC 43 AMG", "GLC 63 AMG"]
            },
            "Audi": {
                "A4": ["Premium", "Premium Plus", "Prestige"],
                "Q5": ["Premium", "Premium Plus", "Prestige"],
                "A6": ["Premium", "Premium Plus", "Prestige"]
            }
        };

        // Populate car companies
        const carCompanySelect = document.getElementById('carCompany');
        const carModelSelect = document.getElementById('carModel');
        const carVariantSelect = document.getElementById('carVariant');

        const selectedCarCompany = document.getElementById('selectedCarCompany');
        const selectedCarModel = document.getElementById('selectedCarModel');
        const selectedCarVariant = document.getElementById('selectedCarVariant');

        function populateCarCompanies() {
            for (const company in carDatabase) {
                const option = document.createElement('option');
                option.value = company;
                option.textContent = company;
                carCompanySelect.appendChild(option);
            }
        }

        // Populate car models based on selected company
        function populateCarModels(company) {
            carModelSelect.innerHTML = '<option value="">Select Car Model</option>';
            carVariantSelect.innerHTML = '<option value="">Select Car Variant</option>';
            if (company && carDatabase[company]) {
                const models = carDatabase[company];
                for (const model in models) {
                    const option = document.createElement('option');
                    option.value = model;
                    option.textContent = model;
                    carModelSelect.appendChild(option);
                }
            }
        }

        // Populate car variants based on selected model
        function populateCarVariants(company, model) {
            carVariantSelect.innerHTML = '<option value="">Select Car Variant</option>';
            if (company && model && carDatabase[company] && carDatabase[company][model]) {
                const variants = carDatabase[company][model];
                variants.forEach(variant => {
                    const option = document.createElement('option');
                    option.value = variant;
                    option.textContent = variant;
                    carVariantSelect.appendChild(option);
                });
            }
        }

        // Update selected car data display
        function updateSelectedCarData() {
            selectedCarCompany.textContent = `Company: ${carCompanySelect.value || "N/A"}`;
            selectedCarModel.textContent = `Model: ${carModelSelect.value || "N/A"}`;
            selectedCarVariant.textContent = `Variant: ${carVariantSelect.value || "N/A"}`;
        }

        // Event listeners
        carCompanySelect.addEventListener('change', () => {
            const selectedCompany = carCompanySelect.value;
            populateCarModels(selectedCompany);
            updateSelectedCarData();
        });

        carModelSelect.addEventListener('change', () => {
            const selectedCompany = carCompanySelect.value;
            const selectedModel = carModelSelect.value;
            populateCarVariants(selectedCompany, selectedModel);
            updateSelectedCarData();
        });

        carVariantSelect.addEventListener('change', updateSelectedCarData);

        // Initial population
        populateCarCompanies();
    </script>
</body>
</html>
