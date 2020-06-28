<?php
namespace Artista\Spider\Metrics;

use Tracking\Abstracts\MetricManager;

/**
 * Run all script analysers and outputs their result.
 */
class FileMetric extends MetricManager
{
    static protected $metricTypes = [
        "Extensions",
        "Identificadores",
        "Groups",
    ];

}