document.addEventListener('DOMContentLoaded', function() {
    // Function to update total score
    function updateTotalScore() {
        let totalScore = 0;
        const maxScore = 1000; // Maximum total score (100 per field * 10 fields)

        // List of all field IDs
        const fields = [
            'melee-weapon', 'firearm', 'armor',
            'caryll-rune-1', 'caryll-rune-2', 'caryll-rune-3', 'caryll-rune-4',
            'blood-gem-1', 'blood-gem-2', 'blood-gem-3'
        ];

        // Calculate the total score by adding selected option's data-score
        fields.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                const selectedOption = element.options[element.selectedIndex];
                if (selectedOption) {
                    // Add the score to total (default to 0 if no score is provided)
                    const score = parseInt(selectedOption.getAttribute('data-score') || '0', 10);
                    totalScore += score;
                }
            }
        });

        // Normalize the total score to a percentage (0 to 100)
        let percentageScore = (totalScore / maxScore) * 100;
        percentageScore = Math.min(Math.max(percentageScore, 0), 100); // Ensure it's between 0 and 100

        // Update the total score field with the percentage
        document.getElementById('total_score').value = Math.round(percentageScore) + '%';
    }

    // Add event listeners for each select dropdown to trigger score update
    document.querySelectorAll('select').forEach(select => {
        select.addEventListener('change', updateTotalScore);
    });

    // Initial call to set the total score when the page loads
    updateTotalScore();
});
