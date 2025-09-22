<?php
// Reusable helpers (include on every page that needs them)
session_start();

function e($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }

/**
 * Decide acceptance.
 * @param string $accomp  Free-form accomplishments text
 * @param int    $numCoursesListed Total courses offered
 * @param int    $numCoursesTaken  Courses the applicant selected
 * @return bool  true = accepted to phone interview
 */
function evaluateApplication(string $accomp, int $numCoursesListed, int $numCoursesTaken): bool {
    $needsKeyword  = 'php';          // swap this out later if needed
    $minPct        = 0.50;           // 50% threshold

    $hasKeyword    = (stripos($accomp, $needsKeyword) !== false);
    $meetsCourses  = ($numCoursesListed > 0) && ($numCoursesTaken / $numCoursesListed >= $minPct);
    return $hasKeyword && $meetsCourses;
}

// Single source of truth for offered courses
function offeredCourses(): array {
    return [
        'Object-oriented programming',
        'Systems analysis & design',
        'Advanced programming',
        'Introduction to Networking',
        'Introduction to Computer Security',
        // add more here any time…
    ];
}
