    <section class="uk-section uk-section-xsmall uk-padding-remove slider-section">
      <div class="uk-background-cover uk-height-small header-section"></div>
    </section>
    <section class="uk-section uk-section-xsmall main-section" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h4 class="uk-h4 uk-text-uppercase uk-text-bold"><i class="fas fa-fist-raised"></i> <?=lang('tab_pvp_statistics');?></h4>
        <ul class="uk-subnav uk-subnav-pill" uk-switcher="connect: .pvp-statistics">
          <?php foreach ($realms as $charsMultiRealm): ?>
          <li><a href="#"><i class="fas fa-server"></i> <?= $this->realm->getRealmName($charsMultiRealm->realmID); ?></a></li>
          <?php endforeach; ?>
        </ul>
        <ul class="uk-switcher pvp-statistics uk-margin-small">
          <?php foreach ($realms as $charsMultiRealm):
            $multiRealm = $this->realm->getRealmConnectionData($charsMultiRealm->id);
          ?>
          <li>
            <div class="uk-grid uk-grid-small uk-child-width-1-1 uk-child-width-1-3@m" data-uk-grid>
              <dir>
                <span class="uk-label uk-label-success uk-text-bold"><?=lang('statistics_top_2v2');?></span>
                <div class="uk-overflow-auto uk-margin-small">
                  <table class="uk-table dark-table uk-table-divider uk-table-small">
                    <thead>
                      <tr>
                        <th class="uk-width-small uk-text-center"><?=lang('table_header_team_name');?></th>
                        <th class="uk-width-small uk-text-center"><i class="fas fa-users"></i> <?=lang('table_header_members');?></th>
                        <th class="uk-width-small uk-text-center"><i class="fas fa-chart-line"></i> <?=lang('table_header_rating');?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($this->pvp_model->getTopArena2v2($multiRealm)->result() as $tops2v2): ?>
                        <tr>
                          <td class="uk-text-center"><?=$tops2v2->name?></td>
                          <td class="uk-text-center">
                            <?php foreach ($this->pvp_model->getMemberTeam($tops2v2->arenaTeamId, $multiRealm)->result() as $mmberteam): ?>
                            <img class="uk-border-circle" src="<?= base_url('assets/images/class/'.class_icon($this->pvp_model->getClassGuid($mmberteam->guid, $multiRealm))); ?>" width="20" height="20" title="<?= $this->pvp_model->getNameGuid($mmberteam->guid, $multiRealm); ?>" alt="">
                            <?php endforeach; ?>
                          </td>
                          <td class="uk-text-center"><?=$tops2v2->rating?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </dir>
              <div>
                <span class="uk-label uk-label-warning uk-text-bold"><?=lang('statistics_top_3v3');?></span>
                <div class="uk-overflow-auto uk-margin-small">
                  <table class="uk-table dark-table uk-table-divider uk-table-small">
                    <thead>
                      <tr>
                        <th class="uk-width-small uk-text-center"><?=lang('table_header_team_name');?></th>
                        <th class="uk-width-small uk-text-center"><i class="fas fa-users"></i> <?=lang('table_header_members');?></th>
                        <th class="uk-width-small uk-text-center"><i class="fas fa-chart-line"></i> <?=lang('table_header_rating');?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($this->pvp_model->getTopArena3v3($multiRealm)->result() as $tops3v3): ?>
                        <tr>
                          <td class="uk-text-center"><?=$tops3v3->name?></td>
                          <td class="uk-text-center">
                            <?php foreach ($this->pvp_model->getMemberTeam($tops3v3->arenaTeamId, $multiRealm)->result() as $mmberteam): ?>
                            <img class="uk-border-circle" src="<?= base_url('assets/images/class/'.class_icon($this->pvp_model->getClassGuid($mmberteam->guid, $multiRealm))); ?>" width="20" height="20" title="<?= $this->pvp_model->getNameGuid($mmberteam->guid, $multiRealm); ?>" alt="">
                            <?php endforeach; ?>
                          </td>
                          <td class="uk-text-center"><?=$tops3v3->rating?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <dir>
                <span class="uk-label uk-label-danger uk-text-bold"><?=lang('statistics_top_5v5');?></span>
                <div class="uk-overflow-auto uk-margin-small">
                  <table class="uk-table dark-table uk-table-divider uk-table-small">
                    <thead>
                      <tr>
                        <th class="uk-width-small uk-text-center"><?=lang('table_header_team_name');?></th>
                        <th class="uk-width-small uk-text-center"><i class="fas fa-users"></i> <?=lang('table_header_members');?></th>
                        <th class="uk-width-small uk-text-center"><i class="fas fa-chart-line"></i> <?=lang('table_header_rating');?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($this->pvp_model->getTopArena5v5($multiRealm)->result() as $tops5v5): ?>
                        <tr>
                          <td class="uk-text-center"><?=$tops5v5->name?></td>
                          <td class="uk-text-center">
                            <?php foreach ($this->pvp_model->getMemberTeam($tops5v5->arenaTeamId, $multiRealm)->result() as $mmberteam): ?>
                            <img class="uk-border-circle" src="<?= base_url('assets/images/class/'.class_icon($this->pvp_model->getClassGuid($mmberteam->guid, $multiRealm))); ?>" width="20" height="20" title="<?= $this->pvp_model->getNameGuid($mmberteam->guid, $multiRealm); ?>" alt="">
                            <?php endforeach; ?>
                          </td>
                          <td class="uk-text-center"><?=$tops5v5->rating?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </dir>
            </div>
            <div class="uk-margin">
              <span class="uk-label uk-text-bold"><?=lang('statistics_top_20');?></span>
              <div class="uk-overflow-auto uk-margin-small">
                <table class="uk-table dark-table uk-table-divider uk-table-small">
                  <thead>
                    <tr>
                      <th class="uk-table-expand"><i class="fas fa-user"></i> <?=lang('table_header_name');?></th>
                      <th class="uk-table-expand uk-text-center"><i class="fas fa-user-tag"></i> <?=lang('table_header_race');?></th>
                      <th class="uk-table-expand uk-text-center"><i class="fas fa-user-tag"></i> <?=lang('table_header_class');?></th>
                      <th class="uk-table-expand uk-text-center"><i class="fas fa-flag"></i> <?=lang('table_header_faction');?></th>
                      <th class="uk-table-expand uk-text-center"><i class="fas fa-info-circle"></i> <?=lang('table_header_total_kills');?></th>
                      <th class="uk-table-expand uk-text-center"><i class="fas fa-crosshairs"></i> <?=lang('table_header_today_kills');?></th>
                      <th class="uk-table-expand uk-text-center"><i class="fas fa-crosshairs"></i> <?=lang('table_header_yersterday_kills');?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($this->pvp_model->getTop20PVP($multiRealm)->result() as $tops): ?>
                      <tr>
                        <td class="uk-text-capitalize"><?= $tops->name ?></td>
                        <td class="uk-text-center"><img class="uk-border-circle" src="<?= base_url('assets/images/races/'.race_icon($tops->race)); ?>" width="20" height="20" alt="Race"></td>
                        <td class="uk-text-center"><img class="uk-border-circle" src="<?= base_url('assets/images/class/'.class_icon($tops->class)); ?>" width="20" height="20" alt="Class"></td>
                        <td class="uk-text-center"><img class="uk-border-circle" src="<?= base_url('assets/images/factions/'.faction_icon($tops->race)); ?>" width="20" height="20" alt="Faction"></td>
                        <td class="uk-text-center"><?= $tops->totalKills ?></td>
                        <td class="uk-text-center"><?= $tops->todayKills ?></td>
                        <td class="uk-text-center"><?= $tops->yesterdayKills ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>
