<?php
/**
 * 
 */

namespace Artista\Components\Worker\Sync;

use SiUtils\Tools\Databases\Mysql\Mysql as MysqlTool;
use Artista\Models\Digital\Infra\Token;
use Artista\Models\Digital\Infra\SshKey;
use SiUtils\Tools\Programs\Git\Admin as GitManiputor;
use Artista\Models\Digital\Code\Project as ProjectModel;
class Project
{

    protected $project = false;

    public function __construct(ProjectModel $project)
    {
        $this->project = $project;
    }

    public function execute()
    {
        // $this->project;

        SshKey::defaultById(4);

        if (!$this->project->repositoryIsCloned()) {
            $repository = GitManiputor::cloneTo($this->project->getRepositoryPath(), $this->project->getRepository());
            dd('Project', $repository);
        }
        $repository = GitManiputor::init($this->project->getRepositoryPath());
    }
}
